function hcPastaGrafikHesapla() {
    const dataText = document.getElementById('hc-pg-data').value.trim();
    const resBody = document.getElementById('hc-pg-res-body');
    const visualDiv = document.getElementById('hc-pg-visual-summary');
    const resultDiv = document.getElementById('hc-pasta-grafik-hesaplama-result');

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
        const match = row.match(/(.*?)\s*[:\s-]\s*([0-9.-]+)/);
        if (match) {
            label = match[1].trim();
            value = parseFloat(match[2]);
        } else {
            label = "Öge " + (items.length + 1);
            value = parseFloat(row.replace(/[^0-9.-]/g, ''));
        }

        if (!isNaN(value) && value > 0) {
            items.push({ label, value });
            total += value;
        }
    }

    if (total === 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    resBody.innerHTML = "";
    visualDiv.innerHTML = "";
    
    const colors = ['#3498db', '#e74c3c', '#2ecc71', '#f1c40f', '#9b59b6', '#34495e', '#e67e22'];

    items.forEach((item, index) => {
        const pct = (item.value / total) * 100;
        const angle = (item.value / total) * 360;
        const color = colors[index % colors.length];

        // Table row
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td><span style="display:inline-block; width:12px; height:12px; background:${color}; margin-right:8px; border-radius:2px;"></span>${item.label}</td>
            <td>%${pct.toLocaleString('tr-TR', {maximumFractionDigits: 1})}</td>
            <td>${angle.toLocaleString('tr-TR', {maximumFractionDigits: 1})}°</td>
        `;
        resBody.appendChild(tr);

        // Visual bar
        const barWrap = document.createElement('div');
        barWrap.className = 'hc-pg-bar-wrap';
        barWrap.innerHTML = `
            <div class="hc-pg-bar-label">${item.label} (%${pct.toFixed(1)})</div>
            <div class="hc-pg-bar-bg"><div class="hc-pg-bar-fill" style="width:${pct}%; background:${color};"></div></div>
        `;
        visualDiv.appendChild(barWrap);
    });

    resultDiv.classList.add('visible');
}
