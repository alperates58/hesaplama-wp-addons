function hcFccHesapla() {
    const dist = parseFloat(document.getElementById('hc-fcc-dist').value);
    const fuel = parseFloat(document.getElementById('hc-fcc-fuel').value);

    if (isNaN(dist) || isNaN(fuel) || dist === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const cons = (fuel / dist) * 100;
    const perKm = fuel / dist;

    document.getElementById('hc-fcc-val').innerText = cons.toFixed(2) + " L / 100km";
    document.getElementById('hc-fcc-cost').innerText = "Kilometre başına " + perKm.toFixed(3) + " Litre yakıt harcanmıştır.";

    document.getElementById('hc-fcc-result').classList.add('visible');
}
