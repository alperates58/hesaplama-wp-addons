function hcHayvanYemHesapla() {
    const weight = parseFloat(document.getElementById('hc-feed-weight').value);
    const percent = parseFloat(document.getElementById('hc-feed-percent').value);
    const feedDm = parseFloat(document.getElementById('hc-feed-dm').value);

    if (isNaN(weight) || isNaN(percent) || isNaN(feedDm) || weight <= 0 || percent <= 0 || feedDm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const kmNeeded = weight * (percent / 100);
    const totalFeed = kmNeeded / (feedDm / 100);

    document.getElementById('hc-feed-km-val').innerText = kmNeeded.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg KM';
    document.getElementById('hc-feed-total-val').innerText = totalFeed.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg Yem';
    
    document.getElementById('hc-feed-result').classList.add('visible');
}
