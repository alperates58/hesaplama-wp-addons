function hcDogurganlikHesapla() {
    const age = parseInt(document.getElementById('hc-fa-age').value);

    if (isNaN(age)) {
        alert('Lütfen yaşınızı girin.');
        return;
    }

    let rate = "";
    let desc = "";

    if (age < 20) {
        rate = "%90+";
        desc = "Doğurganlığın en yüksek olduğu dönemler.";
    } else if (age < 25) {
        rate = "%86";
        desc = "Doğurganlık zirve noktasındadır.";
    } else if (age < 30) {
        rate = "%78";
        desc = "Yüksek doğurganlık devam etmektedir.";
    } else if (age < 35) {
        rate = "%63";
        desc = "Doğurganlıkta hafif bir düşüş başlar, ancak şans hala yüksektir.";
    } else if (age < 40) {
        rate = "%52";
        desc = "Yumurta rezervi ve kalitesinde azalma hızlanır.";
    } else if (age < 45) {
        rate = "%36";
        desc = "Hamilelik şansı azalmış olsa da mümkündür. Tıbbi destek gerekebilir.";
    } else {
        rate = "%5-10";
        desc = "Doğal yollarla hamilelik şansı oldukça düşüktür.";
    }

    document.getElementById('hc-fa-value').innerText = rate;
    document.getElementById('hc-fa-desc').innerText = desc;
    document.getElementById('hc-fertility-age-result').classList.add('visible');
}
