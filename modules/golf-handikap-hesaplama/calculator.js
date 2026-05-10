function hcGolfHandicapHesapla() {
    const score = parseFloat(document.getElementById('hc-gh-score').value);
    const rating = parseFloat(document.getElementById('hc-gh-rating').value);
    const slope = parseFloat(document.getElementById('hc-gh-slope').value);

    if (!score || !rating || !slope) {
        alert('Lütfen tüm saha ve skor bilgilerini giriniz.');
        return;
    }

    // WHS (World Handicap System) Score Differential Formula:
    // (113 / Slope Rating) * (Adjusted Gross Score - Course Rating)
    const diff = (113 / slope) * (score - rating);

    const resVal = document.getElementById('hc-gh-res-val');
    resVal.innerText = diff.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-golf-handicap-result').classList.add('visible');
}
