function hcMacrosHesapla() {
    const kcal = parseFloat(document.getElementById('hc-m-calories').value);
    const goal = document.getElementById('hc-m-goal').value;

    if (!kcal) return;

    let pPerc, cPerc, fPerc;
    if (goal === 'balanced') { cPerc = 0.4; pPerc = 0.3; fPerc = 0.3; }
    else if (goal === 'lowcarb') { cPerc = 0.25; pPerc = 0.4; fPerc = 0.35; }
    else { cPerc = 0.6; pPerc = 0.2; fPerc = 0.2; }

    const prot = (kcal * pPerc) / 4;
    const carb = (kcal * cPerc) / 4;
    const fat = (kcal * fPerc) / 9;

    document.getElementById('hc-m-res-prot').innerText = Math.round(prot);
    document.getElementById('hc-m-res-carb').innerText = Math.round(carb);
    document.getElementById('hc-m-res-fat').innerText = Math.round(fat);

    document.getElementById('hc-macros-result').classList.add('visible');
}
