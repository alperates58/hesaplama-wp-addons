function hcOhmHesapla() {
    const v = parseFloat(document.getElementById('hc-ohm-v').value);
    const i = parseFloat(document.getElementById('hc-ohm-i').value);
    const r = parseFloat(document.getElementById('hc-ohm-r').value);
    const resultDiv = document.getElementById('hc-ohm-result');
    const summary = document.getElementById('hc-ohm-summary');

    let resText = "";
    
    if (!isNaN(v) && !isNaN(i) && isNaN(r)) {
        if (i === 0) { alert('Akım sıfır olamaz.'); return; }
        const calcR = v / i;
        resText = `Direnç (R) = ${calcR.toLocaleString('tr-TR', { maximumFractionDigits: 4 })} Ω`;
    } else if (!isNaN(v) && isNaN(i) && !isNaN(r)) {
        if (r === 0) { alert('Direnç sıfır olamaz.'); return; }
        const calcI = v / r;
        resText = `Akım (I) = ${calcI.toLocaleString('tr-TR', { maximumFractionDigits: 4 })} A`;
    } else if (isNaN(v) && !isNaN(i) && !isNaN(r)) {
        const calcV = i * r;
        resText = `Gerilim (V) = ${calcV.toLocaleString('tr-TR', { maximumFractionDigits: 4 })} V`;
    } else {
        alert('Lütfen hesaplamak istediğiniz alanı boş bırakıp diğer iki alanı doldurun.');
        return;
    }

    summary.innerText = resText;
    resultDiv.classList.add('visible');
}
