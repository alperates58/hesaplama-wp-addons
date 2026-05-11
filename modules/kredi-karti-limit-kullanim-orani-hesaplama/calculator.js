function hcKkLimitKullanimHesapla() {
    const limit = parseFloat(document.getElementById('hc-kklu-limit').value);
    const debt = parseFloat(document.getElementById('hc-kklu-debt').value);

    if (isNaN(limit) || limit <= 0 || isNaN(debt)) {
        alert('Lütfen geçerli bir limit ve borç tutarı girin.');
        return;
    }

    const ratio = (debt / limit) * 100;
    const ratioElem = document.getElementById('hc-kklu-ratio');
    const statusElem = document.getElementById('hc-kklu-status');

    ratioElem.innerText = '%' + ratio.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    let statusText = "";
    let statusClass = "";

    if (ratio <= 30) {
        statusText = "Düşük Kullanım: Kredi skorunuz için mükemmel!";
        statusClass = "hc-status-good";
    } else if (ratio <= 50) {
        statusText = "Orta Kullanım: Kredi skorunuzu olumsuz etkileyebilir.";
        statusClass = "hc-status-warn";
    } else {
        statusText = "Yüksek Kullanım: Kredi skorunuz risk altında!";
        statusClass = "hc-status-bad";
    }

    statusElem.innerText = statusText;
    statusElem.className = "hc-status-box " + statusClass;

    document.getElementById('hc-kklu-result').classList.add('visible');
}
