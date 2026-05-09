function hcFcv2Hesapla() {
    const km = parseFloat(document.getElementById('hc-fcv2-km').value);
    const lt = parseFloat(document.getElementById('hc-fcv2-lt').value);

    if (isNaN(km) || isNaN(lt) || km === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const res = (lt / km) * 100;

    document.getElementById('hc-fcv2-val').innerText = res.toFixed(2) + " L/100km";
    document.getElementById('hc-fcv2-result').classList.add('visible');
}
