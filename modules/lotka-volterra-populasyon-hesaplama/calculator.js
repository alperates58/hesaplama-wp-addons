function hcLotkaVolterraHesapla() {
    let x = parseFloat(document.getElementById('hc-lv-prey').value);
    let y = parseFloat(document.getElementById('hc-lv-predator').value);
    const steps = parseInt(document.getElementById('hc-lv-time').value);

    if (isNaN(x) || isNaN(y)) return;

    // Katsayılar (Örnek değerler)
    const alpha = 0.1; // Av üreme hızı
    const beta = 0.02; // Avcıların avı yakalama verimi
    const delta = 0.01; // Avcıların üreme hızı
    const gamma = 0.1; // Avcıların ölüm hızı

    let output = "<strong>Simülasyon Sonuçları:</strong><br>";
    output += `Başlangıç: Av=${Math.round(x)}, Avcı=${Math.round(y)}<br><hr>`;

    for (let i = 1; i <= steps; i++) {
        let dx = (alpha * x) - (beta * x * y);
        let dy = (delta * x * y) - (gamma * y);
        
        x += dx;
        y += dy;

        if (i % 10 === 0 || i === steps) {
            output += `Adım ${i}: Av=${Math.round(Math.max(0, x))}, Avcı=${Math.round(Math.max(0, y))}<br>`;
        }
        if (x <= 0 && y <= 0) break;
    }

    document.getElementById('hc-lv-stats').innerHTML = output;
    document.getElementById('hc-lv-result').classList.add('visible');
}
