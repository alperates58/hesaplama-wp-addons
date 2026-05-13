function hcCsatHesapla() {
    const satisfied = parseFloat(document.getElementById('hc-csat-satisfied').value);
    const total = parseFloat(document.getElementById('hc-csat-total').value);
    const resultDiv = document.getElementById('hc-memnuniyet-orani-hesaplama-result');

    if (isNaN(satisfied) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (satisfied > total) {
        alert('Memnun müşteri sayısı toplam sayıyı geçemez.');
        return;
    }

    const rate = (satisfied / total) * 100;
    
    document.getElementById('hc-csat-res-val').innerText = `%${rate.toLocaleString('tr-TR', {maximumFractionDigits: 1})}`;
    document.getElementById('hc-csat-bar').style.width = rate + "%";

    resultDiv.classList.add('visible');
}
