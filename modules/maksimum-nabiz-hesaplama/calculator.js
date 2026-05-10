function hcHrMaxHesapla() {
    const age = parseInt(document.getElementById('hc-hm-age').value);
    const formula = document.getElementById('hc-hm-formula').value;

    if (!age) {
        alert('Lütfen yaşınızı giriniz.');
        return;
    }

    let hrmax = 0;
    switch (formula) {
        case 'fox':
            hrmax = 220 - age;
            break;
        case 'tanaka':
            hrmax = 208 - (0.7 * age);
            break;
        case 'gulati':
            hrmax = 206 - (0.88 * age);
            break;
    }

    const resVal = document.getElementById('hc-hm-res-val');
    resVal.innerText = Math.round(hrmax);

    document.getElementById('hc-hr-max-result').classList.add('visible');
}
