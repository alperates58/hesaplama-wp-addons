function hcVeganBeslenmeKarbonAyakİziHesapla() {
    const days = parseFloat(document.getElementById('hc-vb-duration').value);

    if (!days) return;

    // 1 günlük vegan beslenme tasarrufu (ortalama):
    // ~4000 L su, 20 kg tahıl, 3 m2 orman, 9 kg CO2
    const water = days * 4164;
    const co2 = days * 9;
    const forest = days * 2.8;

    document.getElementById('hc-vb-stats').innerHTML = `
        💧 <strong>Su Tasarrufu:</strong> ${Math.round(water).toLocaleString('tr-TR')} Litre<br>
        🌍 <strong>CO₂ Tasarrufu:</strong> ${Math.round(co2).toLocaleString('tr-TR')} kg<br>
        🌳 <strong>Kurtarılan Orman:</strong> ${forest.toFixed(1)} m²<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Hayvansal ürünlerin üretimindeki yoğun kaynak kullanımı baz alınmıştır.</p>
    `;
    document.getElementById('hc-vb-result').classList.add('visible');
}
