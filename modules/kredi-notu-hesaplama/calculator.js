function hcKnHesapla() {
    const grade = parseFloat(document.getElementById('hc-kn-grade').value);
    const credit = parseFloat(document.getElementById('hc-kn-credit').value);

    if (isNaN(grade) || isNaN(credit)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const result = (grade * credit).toFixed(2);
    document.getElementById('hc-kn-val').innerText = result;
    document.getElementById('hc-kn-result').classList.add('visible');
}
