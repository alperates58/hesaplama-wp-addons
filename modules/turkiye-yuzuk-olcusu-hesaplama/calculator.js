function hcTrYuzukHesapla() {
    const dia = parseFloat(document.getElementById('hc-tr-ring-dia').value);

    if (isNaN(dia) || dia < 10) {
        alert('Lütfen geçerli bir çap ölçüsü giriniz.');
        return;
    }

    // ISO 8653: Ölçü = (Çap * PI) - 40
    const size = Math.round((dia * Math.PI) - 40);

    document.getElementById('hc-res-tr-ring').innerText = size;
    document.getElementById('hc-tr-yuzuk-result').classList.add('visible');
}
