function hcDVitDegerHesapla() {
    var val = parseFloat(document.getElementById('hc-dv-val').value);

    if (isNaN(val)) {
        alert('Lütfen bir değer giriniz.');
        return;
    }

    var status = "";
    var yorum = "";
    var statusClass = "";

    if (val < 10) {
        status = "Ciddi Eksiklik";
        yorum = "D vitamini seviyeniz çok düşüktür. Bu durum kemik erimesi ve bağışıklık sistemi zayıflığına neden olabilir. Acilen doktorunuza danışınız.";
        statusClass = "danger";
    } else if (val < 20) {
        status = "Eksiklik";
        yorum = "D vitamini seviyeniz yetersizdir. Genellikle 30 ng/mL ve üzeri hedef alınır. Takviye gerekebilir.";
        statusClass = "danger";
    } else if (val < 30) {
        status = "Yetersizlik (Sınırda)";
        yorum = "Seviyeniz sınırda kabul edilir. İdeal değerler için hafif bir artış faydalı olabilir.";
        statusClass = "warning";
    } else if (val <= 100) {
        status = "Yeterli / Normal";
        yorum = "D vitamini seviyeniz normal sınırlar içindedir. Bu seviyeyi korumanız önerilir.";
        statusClass = "normal";
    } else {
        status = "Yüksek / Toksisite Riski";
        yorum = "100 ng/mL üzerindeki değerler aşırı yüksek kabul edilir ve toksisite riski taşıyabilir. Doktor kontrolü gereklidir.";
        statusClass = "danger";
    }

    var resDiv = document.getElementById('hc-dv-result');
    var statusDiv = document.getElementById('hc-dv-status');
    var yorumDiv = document.getElementById('hc-dv-yorum');

    statusDiv.textContent = status;
    statusDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
