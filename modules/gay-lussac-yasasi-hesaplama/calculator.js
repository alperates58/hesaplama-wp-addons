function hcGayLussacHesapla() {
    let p1 = document.getElementById('hc-gl-p1').value;
    let t1 = document.getElementById('hc-gl-t1').value;
    let p2 = document.getElementById('hc-gl-p2').value;
    let t2 = document.getElementById('hc-gl-t2').value;

    let inputs = [p1, t1, p2, t2];
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

    // Convert to numbers and T to Kelvin
    p1 = parseFloat(p1);
    p2 = parseFloat(p2);
    let T1K = parseFloat(t1) + 273.15;
    let T2K = parseFloat(t2) + 273.15;

    let res = "";
    if (emptyIdx === 0) { // P1
        res = (p2 * T1K) / T2K;
        document.getElementById('hc-gl-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar (P1)';
    } else if (emptyIdx === 1) { // T1
        let resK = (p1 * T2K) / p2;
        res = resK - 273.15;
        document.getElementById('hc-gl-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C (T1)';
    } else if (emptyIdx === 2) { // P2
        res = (p1 * T2K) / T1K;
        document.getElementById('hc-gl-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar (P2)';
    } else if (emptyIdx === 3) { // T2
        let resK = (p2 * T1K) / p1;
        res = resK - 273.15;
        document.getElementById('hc-gl-res-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C (T2)';
    }

    document.getElementById('hc-gl-result').classList.add('visible');
}
