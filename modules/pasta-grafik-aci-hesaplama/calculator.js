function hcPastaAciHesapla() {
    const dataText = document.getElementById('hc-pga-data').value.trim();
    const resBody = document.getElementById('hc-pga-res-body');
    const resultDiv = document.getElementById('hc-pasta-grafik-aci-hesaplama-result');

    if (!dataText) {
        alert('Lütfen veri giriniz.');
        return;
    }

    const numbers = dataText.split(/[,;\s\n\t]+/)
        .map(n => parseFloat(n))
        .filter(n => !isNaN(n) && n > 0);

    const total = numbers.reduce((a, b) => a + b, 0);
    if (total === 0) {
        alert('Toplam değer pozitif olmalıdır.');
        return;
    }

    resBody.innerHTML = "";
    numbers.forEach((val, i) => {
        const pct = (val / total) * 100;
        const angle = (val / total) * 360;
        
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${i + 1}</td>
            <td>${val.toLocaleString('tr-TR')}</td>
            <td>%${pct.toLocaleString('tr-TR', {maximumFractionDigits: 2})}</td>
            <td><strong>${angle.toLocaleString('tr-TR', {maximumFractionDigits: 2})}°</strong></td>
        `;
        resBody.appendChild(tr);
    });

    resultDiv.classList.add('visible');
}
