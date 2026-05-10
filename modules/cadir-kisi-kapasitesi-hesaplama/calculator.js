function hcÇadırKişiKapasitesiHesapla() {
    const w = parseFloat(document.getElementById('hc-tn-w').value);
    const l = parseFloat(document.getElementById('hc-tn-l').value);
    const comfort = parseFloat(document.getElementById('hc-tn-comfort').value);

    if (!w || !l) return;

    // Uzun kenara paralel yatış varsayımı
    const sideA = Math.floor(w / comfort);
    const sideB = Math.floor(l / 200); // Ortalama insan boyu 200cm
    
    // Veya tam tersi
    const altA = Math.floor(l / comfort);
    const altB = Math.floor(w / 200);

    const capacity = Math.max(sideA * sideB, altA * altB, 1);

    document.getElementById('hc-tn-val').innerText = capacity + ' Kişi';
    document.getElementById('hc-tn-result').classList.add('visible');
}
