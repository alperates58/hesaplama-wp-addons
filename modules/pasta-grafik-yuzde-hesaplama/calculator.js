function hcPastaYuzdeHesapla() {
    const dataText = document.getElementById('hc-pie-data').value.trim();
    const resBody = document.getElementById('hc-pie-res-body');
    const totalValSpan = document.getElementById('hc-pie-total-val');
    const resultDiv = document.getElementById('hc-pasta-grafik-yuzde-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri giriniz.');
        return;
    }

    const rows = dataText.split('\n');
    let items = [];
    let total = 0;

    for (let row of rows) {
        let label = "";
        let value = 0;
        if (row.includes(':')) {
            const parts = row.split(':');
            label = parts[0].trim();
            value = parseFloat(parts[1].replace(/[^0-9.-]/g, ''));
        } else {
            label = "Öge " + (items.length + 1);
            value = parseFloat(row.replace(/[^0-9.-]/g, ''));
        }

        if (!isNaN(value)) {
            items.push({ label, value });
            total += value;
        }
    }

    if (total === 0) {
        alert('Toplam değer sıfır olamaz.');
        return;
    }

    resBody.innerHTML = "";
    for (let item of items) {
        const pct = (item.value / total) * 100;
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${item.label}</td>
            <td>${item.value.toLocaleString('tr-TR')}</td>
            <td>%${pct.toLocaleString('tr-TR', {maximumFractionDigits: 2})}</td>
        `;
        resBody.appendChild(tr);
    }

    totalValSpan.innerText = total.toLocaleString('tr-TR');
    resultDiv.classList.add('visible');
}
