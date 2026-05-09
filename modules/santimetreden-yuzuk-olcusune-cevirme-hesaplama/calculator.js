function hcCmToRingHesapla() {
    const cm = parseFloat(document.getElementById('hc-ring-cm').value);
    if (isNaN(cm) || cm < 4) {
        alert('Lütfen geçerli bir ölçü giriniz.');
        return;
    }

    const mm = cm * 10;
    const size = Math.round(mm - 40);

    document.getElementById('hc-res-ring-size-cm').innerText = size;
    document.getElementById('hc-cm-to-ring-result').classList.add('visible');
}
