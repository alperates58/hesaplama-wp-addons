function hcColdBrewHesapla() {
    const type = document.getElementById('hc-cb-type').value;
    const coffee = parseFloat(document.getElementById('hc-cb-coffee').value) || 0;

    let ratio = 8;
    if (type === 'concentrate') ratio = 4;
    else if (type === 'light') ratio = 12;

    const water = coffee * ratio;

    document.getElementById('hc-res-cb-water').innerText = Math.round(water) + ' ml';
    document.getElementById('hc-cold-brew-result').classList.add('visible');
}
