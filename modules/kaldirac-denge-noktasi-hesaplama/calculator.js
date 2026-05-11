function hcLeverBalanceHesapla() {
    let f1 = document.getElementById('hc-lb-f1').value;
    let d1 = document.getElementById('hc-lb-d1').value;
    let f2 = document.getElementById('hc-lb-f2').value;
    let d2 = document.getElementById('hc-lb-d2').value;

    let inputs = [f1, d1, f2, d2];
    let emptyIdx = -1;
    let count = 0;

    inputs.forEach((val, idx) => {
        if (val === "") emptyIdx = idx;
        else count++;
    });

    if (count !== 3) {
        alert('Lütfen hesaplamak istediğiniz değer dışındaki tam 3 alanı doldurun.');
        return;
    }

    f1 = parseFloat(f1);
    d1 = parseFloat(d1);
    f2 = parseFloat(f2);
    d2 = parseFloat(d2);

    let res = 0;
    let label = "";

    if (emptyIdx === 0) { // F1
        res = (f2 * d2) / d1;
        label = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N (F1)';
    } else if (emptyIdx === 1) { // d1
        res = (f2 * d2) / f1;
        label = res.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m (d1)';
    } else if (emptyIdx === 2) { // F2
        res = (f1 * d1) / d2;
        label = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' N (F2)';
    } else if (emptyIdx === 3) { // d2
        res = (f1 * d1) / f2;
        label = res.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m (d2)';
    }

    document.getElementById('hc-lb-res-val').innerText = label;
    document.getElementById('hc-lb-result').classList.add('visible');
}
