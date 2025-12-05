const monthYearElement = document.getElementById('monthYear');
const datesElement = document.getElementById('dates');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const textoFecha = document.getElementById('fechaSeleccionada');

let currentDate = new Date();

const updateCalendar = () => {
    const currentYear = currentDate.getFullYear();
    const currentMonth = currentDate.getMonth();

    const firstDay = new Date(currentYear, currentMonth, 0);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const totalDays = lastDay.getDate();
    const firstDayIndex = firstDay.getDay();
    const lastDayIndex = lastDay.getDay();

    const monthYearString = currentDate.toLocaleDateString('default', { month: 'long', year: 'numeric' });
    monthYearElement.textContent = monthYearString;

    let datesHTML = '';

    for (let i = firstDayIndex; i > 0; i--) {
        const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);
        datesHTML += `<div class="date inactive">${prevDate.getDate()}</div>`;
    }

    for (let i = 1; i <= totalDays; i++) {
        const date = new Date(currentYear, currentMonth, i);
        const fechaStr = date.toISOString().split("T")[0];

        const isToday = date.toDateString() === new Date().toDateString();
        const isReserved = fechasOcupadas.includes(fechaStr);

        let classes = "date";
        if (isToday) classes += " active";
        if (isReserved) classes += " reserved";

        datesHTML += `<div class="${classes}" data-fecha="${fechaStr}">${i}</div>`;
    }

    for (let i = 1; i <= 7 - lastDay; i++) {
        const nextDate = new Date(currentYear, currentMonth + 1, i);
        datesHTML += `<div class="date inactive">${nextDate.getDate()}</div>`;
    }

    datesElement.innerHTML = datesHTML;
}

prevBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() - 1);
    updateCalendar();
})

nextBtn.addEventListener('click', () => {
    currentDate.setMonth(currentDate.getMonth() + 1);
    updateCalendar();
})

updateCalendar();

datesElement.addEventListener("click", e => {
    if (!e.target.classList.contains("date")) return;

    if (e.target.classList.contains("reserved")) {
        alert("Este vehículo ya está reservado ese día.");
        return;
    }

    // Selección normal
    document.querySelectorAll(".date").forEach(d => d.classList.remove("selected"));
    e.target.classList.add("selected");
    const fecha = e.target.dataset.fecha;
    fechaSeleccionada.textContent = fecha;
    document.getElementById("inputFecha").value = fecha;

    console.log("Fecha seleccionada:", fecha);
});



let map;
let marker;
let modoUbicacion = "";
let selectedLat = null;
let selectedLng = null;

document.getElementById('modalMapa').addEventListener('shown.bs.modal', function () {

    if (!map) {
        map = L.map('map').setView([19.4326, -99.1332], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        map.on("click", function (e) {
            const { lat, lng } = e.latlng;

            if (marker) marker.remove();
            marker = L.marker([lat, lng]).addTo(map);

            selectedLat = lat;
            selectedLng = lng;
        });

    } else {
        setTimeout(() => {
            map.invalidateSize();
        }, 200);
    }

});


function guardarUbicacion() {
    if (!selectedLat || !selectedLng) return;

    if (modoUbicacion === "inicio") {
        document.getElementById("ubicInicio").value = `${selectedLat}, ${selectedLng}`;
    } else if (modoUbicacion === "final") {
        document.getElementById("ubicFinal").value = `${selectedLat}, ${selectedLng}`;
    }
}



const horaInicioInput = document.querySelector('input[name="hora_inicio"]');
const horaFinInput = document.querySelector('input[name="hora_fin"]');
const totalPagarInput = document.getElementById('totalPagar');

function calcularPrecio() {
    const inicio = horaInicioInput.value;
    const fin = horaFinInput.value;

    if (!inicio || !fin) return;

    const [h1, m1] = inicio.split(":").map(Number);
    const [h2, m2] = fin.split(":").map(Number);

    // Convertir a minutos desde 00:00
    const minutosInicio = h1 * 60 + m1;
    const minutosFin = h2 * 60 + m2;

    // Si la hora fin es menor, significa que pasó de medianoche
    let minutosTotales = minutosFin - minutosInicio;
    if (minutosTotales <= 0) minutosTotales += 24 * 60;

    // Convertir a horas decimales
    const horas = minutosTotales / 60;

    // Calcular total
    const total = horas * valorHora;

    totalPagarInput.value = total.toFixed(2);
}

horaInicioInput.addEventListener("change", calcularPrecio);
horaFinInput.addEventListener("change", calcularPrecio);
