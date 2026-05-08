function hcGebelikteKiloHesapla() {
    const h = parseFloat(document.getElementById('hc-pw-height').value) / 100;
    const w = parseFloat(document.getElementById('hc-pw-weight').value);

    if (isNaN(h) || isNaN(w)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const bmi = w / (h * h);
    let target = "";
    let desc = "";

    if (bmi < 18.5) {
        target = "12.5 - 18 kg";
        desc = "Başlangıç kilonuz düşük olduğu için daha fazla kilo alımı önerilir.";
    } else if (bmi < 25) {
        target = "11.5 - 16 kg";
        desc = "İdeal bir başlangıç kilosuna sahipsiniz.";
    } else if (bmi < 30) {
        target = "7 - 11.5 kg";
        desc = "Başlangıç kilonuz hafif yüksek olduğu için dengeli artış önemlidir.";
    } else {
        target = "5 - 9 kg";
        desc = "Gebelikte aşırı kilo alımından kaçınmanız önerilir.";
    }

    document.getElementById('hc-pw-value').innerText = target;
    document.getElementById('hc-pw-details').innerText = desc;
    document.getElementById('hc-preg-weight-result').classList.add('visible');
}
