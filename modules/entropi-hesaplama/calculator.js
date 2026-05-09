function hcEntropiHesapla() {
    const Q = parseFloat(document.getElementById('hc-s-q').value);
    const Tc = parseFloat(document.getElementById('hc-s-t').value);

    if (isNaN(Q) || isNaN(Tc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const T = Tc + 273.15;
    if (T === 0) {
        alert('Sıcaklık 0 K olamaz.');
        return;
    }

    const ds = Q / T;

    document.getElementById('hc-s-val').innerText = ds.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' J/K';
    document.getElementById('hc-s-result').classList.add('visible');
}
