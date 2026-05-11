function hcAsitlikOraniHesapla() {
    const V = parseFloat(document.getElementById('hc-acid-v').value);
    const N = parseFloat(document.getElementById('hc-acid-n').value);
    const W = parseFloat(document.getElementById('hc-acid-w').value);
    const factor = parseFloat(document.getElementById('hc-acid-type').value);

    if (!V || !N || !W) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }

    // Formul: % Asit = (V * N * MW) / (10 * W)
    // Burada factor degiskeni MW / 10 olarak selectbox'tan geliyor.
    const asitlik = (V * N * factor) / W;

    const sonucDiv = document.getElementById('hc-acidity-result');
    document.getElementById('hc-acid-res-val').innerText = '%' + asitlik.toLocaleString('tr-TR', {maximumFractionDigits: 3});
    
    const noteDiv = document.getElementById('hc-acid-res-note');
    let yorum = "";
    if (factor == 28.2) {
        if (asitlik <= 0.8) yorum = "Sızma Zeytinyağı standardına uygundur.";
        else if (asitlik <= 2.0) yorum = "Natürel Birinci Zeytinyağı standardındadır.";
        else yorum = "Ham/Rafine edilecek yağ sınıfındadır.";
    }
    noteDiv.innerText = yorum;

    sonucDiv.classList.add('visible');
}
