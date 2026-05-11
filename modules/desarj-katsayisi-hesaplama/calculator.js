function hcDesarjKatsayisiHesapla() {
    const gercek = parseFloat(document.getElementById('hc-dk-gercek').value);
    const teorik = parseFloat(document.getElementById('hc-dk-teorik').value);

    if (isNaN(gercek) || isNaN(teorik) || teorik <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const Cd = gercek / teorik;

    document.getElementById('hc-dk-res-val').innerText = Cd.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-dk-result').classList.add('visible');
}
