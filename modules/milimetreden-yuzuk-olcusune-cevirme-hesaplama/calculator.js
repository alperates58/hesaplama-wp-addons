function hcMmToRingHesapla() {
    const mm = parseFloat(document.getElementById('hc-ring-mm').value);
    if (isNaN(mm) || mm < 40) {
        alert('Lütfen geçerli bir ölçü giriniz.');
        return;
    }

    const size = Math.round(mm - 40);

    document.getElementById('hc-res-ring-size-mm').innerText = size;
    document.getElementById('hc-mm-to-ring-result').classList.add('visible');
}
