function hcFev1FvcHesapla() {
    const fev1 = parseFloat(document.getElementById('hc-ff-fev1').value);
    const fvc = parseFloat(document.getElementById('hc-ff-fvc').value);

    if (isNaN(fev1) || isNaN(fvc) || fvc === 0) {
        alert('Lütfen geçerli FEV1 ve FVC değerleri giriniz.');
        return;
    }

    const ratio = (fev1 / fvc) * 100;
    const resVal = document.getElementById('hc-ff-res-val');
    const resDesc = document.getElementById('hc-ff-res-desc');

    resVal.innerText = '%' + ratio.toFixed(1).toLocaleString('tr-TR');

    if (ratio >= 70) {
        resDesc.innerText = 'Normal (Obstrüksiyon saptanmadı).';
        resDesc.style.color = '#27ae60';
    } else {
        resDesc.innerText = 'Düşük (Hava yolu tıkanıklığı göstergesi olabilir).';
        resDesc.style.color = '#e74c3c';
    }

    document.getElementById('hc-fev1-fvc-result').classList.add('visible');
}
