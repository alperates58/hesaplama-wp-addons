function hcBasamakDegeriHesapla() {
    const nRaw = document.getElementById('hc-pv-val').value;
    if (!nRaw) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    const nStr = Math.abs(parseInt(nRaw)).toString();
    const len = nStr.length;
    const body = document.getElementById('hc-res-pv-body');
    body.innerHTML = '';

    const labels = [
        'Birler', 'Onlar', 'Yüzler', 'Binler', 'On Binler', 'Yüz Binler', 
        'Milyonlar', 'On Milyonlar', 'Yüz Milyonlar'
    ];

    for (let i = 0; i < len; i++) {
        const digit = nStr[i];
        const power = len - 1 - i;
        const placeValue = parseInt(digit) * Math.pow(10, power);
        const label = power < labels.length ? labels[power] : (Math.pow(10, power).toExponential() + 'lar');

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${digit}</td>
            <td>${label}</td>
            <td class="hc-pv-val-col">${placeValue.toLocaleString('tr-TR')}</td>
        `;
        body.appendChild(row);
    }

    document.getElementById('hc-pv-result').classList.add('visible');
}
