function hcSigaraİzmaritiKirlilikEtkisiHesapla() {
    const total = parseFloat(document.getElementById('hc-sb-count').value);
    const percent = parseFloat(document.getElementById('hc-sb-percent').value) / 100;

    if (!total) return;

    const thrown = total * percent;
    
    // 1 izmarit ~1000 litre suyu toksik hale getirebilir (balıklar için).
    // Plastik filtrelerin doğada çözünmesi ~10-15 yıl sürer.
    const toxicWater = thrown * 500; // Muhafazakar tahmin: 500L
    const microplastics = thrown * 0.005; // 5mg mikroplastik/izmarit

    document.getElementById('hc-sb-stats').innerHTML = `
        🗑️ <strong>Doğaya Atılan İzmarit:</strong> ${Math.round(thrown).toLocaleString('tr-TR')} adet<br>
        💧 <strong>Toksikleşen Su Potansiyeli:</strong> ${Math.round(toxicWater).toLocaleString('tr-TR')} Litre<br>
        🧪 <strong>Mikroplastik Yükü:</strong> ${microplastics.toFixed(2)} kg<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*İzmaritler dünyadaki en yaygın kıyı atığıdır ve içindeki arsenik, kurşun gibi maddeler suya karışır.</p>
    `;
    document.getElementById('hc-sb-result').classList.add('visible');
}
