function hcYuzukOlcuHesapla() {
    const circum = parseFloat(document.getElementById('hc-ring-circum').value);

    if (isNaN(circum) || circum < 40 || circum > 80) {
        alert('Lütfen 40 ile 80 mm arasında geçerli bir çevre ölçüsü giriniz.');
        return;
    }

    // Türkiye ve Avrupa standardı: Ölçü = Çevre - 40
    const size = Math.round(circum - 40);

    document.getElementById('hc-res-ring-size').innerText = size;
    document.getElementById('hc-yuzuk-olcu-result').classList.add('visible');
}
