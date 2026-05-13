function hcResidualHesapla() {
    const actualStr = document.getElementById('hc-res-actual').value;
    const predStr = document.getElementById('hc-res-pred').value;

    const actual = actualStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));
    const pred = predStr.split(/[,\s]+/).map(n => n.trim()).filter(n => n !== "").map(Number).filter(n => !isNaN(n));

    if (actual.length === 0 || actual.length !== pred.length) {
        alert('Lütfen her iki alan için de aynı sayıda geçerli sayı girin.');
        return;
    }

    const tbody = document.getElementById('hc-res-tbody');
    tbody.innerHTML = '';
    let sum = 0;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 4 });

    for (let i = 0; i < actual.length; i++) {
        const res = actual[i] - pred[i];
        sum += res;
        
        const row = tbody.insertRow();
        row.insertCell(0).innerText = i + 1;
        row.insertCell(1).innerText = fmt(actual[i]);
        row.insertCell(2).innerText = fmt(pred[i]);
        const resCell = row.insertCell(3);
        resCell.innerText = fmt(res);
        resCell.style.fontWeight = 'bold';
        resCell.style.color = res >= 0 ? '#27ae60' : '#c0392b';
    }

    document.getElementById('hc-res-sum').innerText = fmt(sum);
    document.getElementById('hc-artik-deger-hesaplama-result').classList.add('visible');
}
