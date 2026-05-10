function hcSfToggleFields() {
    const gender = document.getElementById('hc-sf-gender').value;
    document.getElementById('hc-sf-m-fields').style.display = (gender === 'male') ? 'block' : 'none';
    document.getElementById('hc-sf-f-fields').style.display = (gender === 'female') ? 'block' : 'none';
}

function hcSkinfoldHesapla() {
    const gender = document.getElementById('hc-sf-gender').value;
    const age = parseFloat(document.getElementById('hc-sf-age').value);
    const thigh = parseFloat(document.getElementById('hc-sf-thigh').value);
    
    let sum = 0;
    let density = 0;

    if (gender === 'male') {
        const chest = parseFloat(document.getElementById('hc-sf-chest').value);
        const abd = parseFloat(document.getElementById('hc-sf-abd').value);
        if (!chest || !abd || !thigh || !age) { alert('Tüm alanları doldurun.'); return; }
        sum = chest + abd + thigh;
        density = 1.10938 - (0.0008267 * sum) + (0.0000016 * sum * sum) - (0.0002574 * age);
    } else {
        const tri = parseFloat(document.getElementById('hc-sf-tri').value);
        const supra = parseFloat(document.getElementById('hc-sf-supra').value);
        if (!tri || !supra || !thigh || !age) { alert('Tüm alanları doldurun.'); return; }
        sum = tri + supra + thigh;
        density = 1.0994921 - (0.0009929 * sum) + (0.0000023 * sum * sum) - (0.0001392 * age);
    }

    // Siri Equation
    const fatPercent = (495 / density) - 450;
    
    document.getElementById('hc-sf-res-val').innerText = fatPercent.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-skinfold-result').classList.add('visible');
}
