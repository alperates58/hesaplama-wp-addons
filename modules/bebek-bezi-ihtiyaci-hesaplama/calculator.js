function hcBebekBeziİhtiyacıHesapla() {
    const age = parseFloat(document.getElementById('hc-dp-age').value);

    let daily = 8;
    if (age <= 1) daily = 10;
    else if (age <= 6) daily = 8;
    else if (age <= 12) daily = 6;
    else daily = 4;

    const monthly = daily * 30;

    document.getElementById('hc-dp-val').innerText = monthly + ' Adet';
    document.getElementById('hc-dp-daily').innerText = `Günde yaklaşık ${daily} adet bez.`;
    document.getElementById('hc-dp-result').classList.add('visible');
}
