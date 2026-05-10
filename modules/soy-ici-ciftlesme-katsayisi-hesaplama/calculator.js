function hcInbreedingHesapla() {
    const f = parseFloat(document.getElementById('hc-ib-relation').value);
    const resVal = document.getElementById('hc-ib-res-val');
    const resDesc = document.getElementById('hc-ib-res-desc');

    resVal.innerText = f.toFixed(4).toLocaleString('tr-TR');

    if (f >= 0.25) {
        resDesc.innerText = "Çok yüksek riskli çiftleşme. Genetik bozukluk olasılığı yüksektir.";
        resDesc.style.color = "#e74c3c";
    } else if (f > 0) {
        resDesc.innerText = "Düşük/Orta seviye akrabalı çiftleşme.";
        resDesc.style.color = "#f1c40f";
    } else {
        resDesc.innerText = "Genetik açıdan güvenli (akraba dışı) çiftleşme.";
        resDesc.style.color = "#27ae60";
    }

    document.getElementById('hc-inbreeding-result').classList.add('visible');
}
