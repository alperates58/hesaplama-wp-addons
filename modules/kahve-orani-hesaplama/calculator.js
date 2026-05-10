function hcCoffeeRatioHesapla() {
    const coffee = parseFloat(document.getElementById('hc-ratio-coffee').value);
    const water = parseFloat(document.getElementById('hc-ratio-water').value);
    const target = parseFloat(document.getElementById('hc-ratio-target').value);

    if (isNaN(target)) {
        alert('Lütfen hedef oranı giriniz.');
        return;
    }

    let resVal = '';
    let resDesc = '';

    if (!isNaN(coffee) && isNaN(water)) {
        // Kahveye göre su hesapla
        const resWater = coffee * target;
        resVal = resWater.toLocaleString('tr-TR') + ' ml Su';
        resDesc = `${coffee}g kahve için 1:${target} oranında ${resWater}ml su gerekir.`;
    } else if (isNaN(coffee) && !isNaN(water)) {
        // Suya göre kahve hesapla
        const resCoffee = water / target;
        resVal = resCoffee.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g Kahve';
        resDesc = `${water}ml su için 1:${target} oranında ${resCoffee.toFixed(1)}g kahve gerekir.`;
    } else if (!isNaN(coffee) && !isNaN(water)) {
        // Mevcut oranı hesapla
        const currentRatio = water / coffee;
        resVal = '1 : ' + currentRatio.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
        resDesc = `Mevcut oranınız 1:${currentRatio.toFixed(1)}.`;
    } else {
        alert('Lütfen en az iki alanı doldurunuz.');
        return;
    }

    document.getElementById('hc-ratio-val').innerText = resVal;
    document.getElementById('hc-ratio-desc').innerText = resDesc;
    document.getElementById('hc-coffee-ratio-result').classList.add('visible');
}
