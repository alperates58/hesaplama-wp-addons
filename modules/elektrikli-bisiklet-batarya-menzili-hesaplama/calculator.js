function hcElektrikliBisikletBataryaMenziliHesapla() {
    const wh = parseFloat(document.getElementById('hc-br-wh').value);
    const health = parseFloat(document.getElementById('hc-br-health').value) / 100;
    const tempFactor = parseFloat(document.getElementById('hc-br-temp').value);

    if (!wh) return;

    const usableWh = wh * health * tempFactor * 0.9;
    const baseRange = usableWh / 12; // 12 Wh/km base

    document.getElementById('hc-br-val').innerText = Math.round(baseRange) + ' km';

    const modes = [
        { name: "Eco", cons: 8 },
        { name: "Tour", cons: 12 },
        { name: "Sport", cons: 16 },
        { name: "Turbo", cons: 22 }
    ];

    let html = "<strong>Modlara Göre Menzil:</strong><br><ul style='list-style:none; padding:0; margin-top:5px;'>";
    modes.forEach(m => {
        const r = usableWh / m.cons;
        html += `<li>${m.name}: ${Math.round(r)} km</li>`;
    });
    html += "</ul>";

    document.getElementById('hc-br-table').innerHTML = html;
    document.getElementById('hc-batt-result').classList.add('visible');
}
