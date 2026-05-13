function hcIkiZarHesapla() {
    const target = document.getElementById('hc-dice-target').value;
    const tbody = document.getElementById('hc-dice-tbody');
    tbody.innerHTML = '';

    const combinations = {};
    for (let i = 2; i <= 12; i++) combinations[i] = 0;

    for (let d1 = 1; d1 <= 6; d1++) {
        for (let d2 = 1; d2 <= 6; d2++) {
            combinations[d1 + d2]++;
        }
    }

    const totalCombos = 36;
    
    if (target === 'all') {
        for (let i = 2; i <= 12; i++) {
            addRow(i, combinations[i], totalCombos);
        }
        document.getElementById('hc-dice-summary').innerText = "Tüm olasılıklar listelendi.";
    } else {
        const t = parseInt(target);
        addRow(t, combinations[t], totalCombos);
        const prob = (combinations[t] / totalCombos * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
        document.getElementById('hc-dice-summary').innerText = `Toplamın ${t} olma olasılığı %${prob}`;
    }

    function addRow(sum, count, total) {
        const row = tbody.insertRow();
        row.insertCell(0).innerText = sum;
        row.insertCell(1).innerText = count + " / 36";
        row.insertCell(2).innerText = "%" + (count / total * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    document.getElementById('hc-iki-zar-result').classList.add('visible');
}
