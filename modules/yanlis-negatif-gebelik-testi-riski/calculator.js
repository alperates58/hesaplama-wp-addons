function hcFnRiskHesapla() {
    var dpo = parseInt(document.getElementById('hc-fn-dpo').value);

    if (isNaN(dpo)) {
        alert('Lütfen günü giriniz.');
        return;
    }

    var risk = "";
    var yorum = "";
    var statusClass = "";

    if (dpo < 8) {
        risk = "%95 - %100";
        yorum = "Çok erken! Bu dönemde testin yanlış negatif sonuç verme ihtimali çok yüksektir. Implantasyon henüz gerçekleşmemiş olabilir.";
        statusClass = "danger";
    } else if (dpo === 10) {
        risk = "%30 - %40";
        yorum = "Hala yüksek risk. Negatif sonuç alırsanız birkaç gün sonra testi tekrarlamanız önerilir.";
        statusClass = "warning";
    } else if (dpo === 12) {
        risk = "%10 - %15";
        yorum = "Risk azalmış durumda. Testin doğruluğu artıyor.";
        statusClass = "warning";
    } else if (dpo >= 14) {
        risk = "< %1 - %5";
        yorum = "Test oldukça güvenilir. Adet gecikmesi yaşanmışsa sonuç genellikle doğrudur.";
        statusClass = "normal";
    } else {
        risk = "Yüksek Risk";
        yorum = "Yumurtlamadan sonraki ilk 12 gün içinde yapılan testlerde hata payı mevcuttur.";
        statusClass = "warning";
    }

    var resDiv = document.getElementById('hc-fn-result');
    var statusDiv = document.getElementById('hc-fn-status');
    var yorumDiv = document.getElementById('hc-fn-yorum');

    statusDiv.textContent = "Hata Riski: " + risk;
    statusDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
