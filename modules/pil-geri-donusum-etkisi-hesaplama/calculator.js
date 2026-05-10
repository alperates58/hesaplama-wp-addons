function hcPilGeriDönüşümEtkisiHesapla() {
    const count = parseFloat(document.getElementById('hc-br-count').value);

    if (!count) return;

    // 1 adet pil yaklaşık 4 metrekare toprağı kirletebilir.
    // 1 adet pil 800.000 litre suyu içilemez hale getirebilir (bazı türler).
    const soilSaved = count * 4;
    const waterSaved = count * 600000; // Ortalama değer

    document.getElementById('hc-br-stats').innerHTML = `
        🌱 <strong>Kurtarılan Toprak Alanı:</strong> ${soilSaved.toLocaleString('tr-TR')} m²<br>
        💧 <strong>Kirlenmesi Engellenen Su:</strong> ${waterSaved.toLocaleString('tr-TR')} Litre<br>
        🧪 <strong>Engellenen Ağır Metal:</strong> ${(count * 0.02).toFixed(2)} kg (Tahmini)
    `;
    document.getElementById('hc-br-result').classList.add('visible');
}
