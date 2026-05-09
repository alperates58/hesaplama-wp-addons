function hcPcHesapla() {
    const oldVal = parseFloat(document.getElementById('hc-pc-old').value);
    const newVal = parseFloat(document.getElementById('hc-pc-new').value);

    if (isNaN(oldVal) || isNaN(newVal) || oldVal === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const change = newVal - oldVal;
    const percentage = (change / Math.abs(oldVal)) * 100;

    const card = document.getElementById('hc-pc-card');
    const label = document.getElementById('hc-pc-label');
    const info = document.getElementById('hc-pc-info');
    const valSpan = document.getElementById('hc-res-pc-val');

    valSpan.innerText = Math.abs(percentage).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    if (percentage > 0) {
        card.className = 'hc-res-card success';
        label.innerText = 'ARTIŞ';
        info.innerText = `${oldVal} değerinden ${newVal} değerine artış.`;
    } else if (percentage < 0) {
        card.className = 'hc-res-card error';
        label.innerText = 'AZALIŞ';
        info.innerText = `${oldVal} değerinden ${newVal} değerine azalış.`;
    } else {
        card.className = 'hc-res-card info';
        label.innerText = 'DEĞİŞİM YOK';
        info.innerText = 'Değerler birbirine eşit.';
    }

    document.getElementById('hc-pc-result').classList.add('visible');
}
