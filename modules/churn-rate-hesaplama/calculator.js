function hcChurnRateHesapla() {
    var baslangic = parseFloat(document.getElementById('hc-cr-baslangic').value) || 0;
    var ayrilan = parseFloat(document.getElementById('hc-cr-ayrilan').value) || 0;

    if (baslangic <= 0) {
        alert('Lütfen dönem başlangıcındaki abone sayısını giriniz.');
        return;
    }

    if (ayrilan > baslangic) {
        alert('Kaybedilen abone sayısı başlangıç sayısından fazla olamaz.');
        return;
    }

    var churn = (ayrilan / baslangic) * 100;
    var retention = 100 - churn;

    document.getElementById('hc-cr-res-oran').innerText = '%' + churn.toFixed(2);
    document.getElementById('hc-cr-res-retention').innerText = '%' + retention.toFixed(2);

    document.getElementById('hc-cr-result').classList.add('visible');
}