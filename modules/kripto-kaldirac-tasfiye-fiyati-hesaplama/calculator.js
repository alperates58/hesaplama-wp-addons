function hcKriptoTasfiyeFiyatiHesapla() {
    var giris = parseFloat(document.getElementById('hc-ktf-giris').value) || 0;
    var kaldirac = parseFloat(document.getElementById('hc-ktf-kaldirac').value) || 0;
    var yon = document.getElementById('hc-ktf-yon').value;

    if (giris <= 0 || kaldirac <= 0) {
        alert('Lütfen giriş fiyatı ve kaldıraç oranını doğru giriniz.');
        return;
    }

    var mm = 0.005;
    var tasfiyeFiyati = 0;

    if (yon === 'long') {
        tasfiyeFiyati = giris * (1 - (1 / kaldirac) + mm);
    } else {
        tasfiyeFiyati = giris * (1 + (1 / kaldirac) - mm);
    }

    if (tasfiyeFiyati < 0) {
        tasfiyeFiyati = 0;
    }

    document.getElementById('hc-ktf-res-yon').innerText = yon.toUpperCase();
    document.getElementById('hc-ktf-res-kaldirac').innerText = kaldirac + 'x';
    document.getElementById('hc-ktf-res-fiyat').innerText = tasfiyeFiyati.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 4});

    document.getElementById('hc-ktf-result').classList.add('visible');
}