function hcKaloriHesapla() {
    const carb = parseFloat(document.getElementById('hc-cal-carb').value) || 0;
    const prot = parseFloat(document.getElementById('hc-cal-prot').value) || 0;
    const fat = parseFloat(document.getElementById('hc-cal-fat').value) || 0;

    if (carb < 0 || prot < 0 || fat < 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const totalKcal = (carb * 4) + (prot * 4) + (fat * 9);

    document.getElementById('hc-cal-val').innerText = totalKcal.toLocaleString('tr-TR') + ' kcal';
    document.getElementById('hc-cal-result').classList.add('visible');
}
