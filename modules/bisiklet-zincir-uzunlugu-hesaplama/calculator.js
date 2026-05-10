function hcBisikletZincirUzunluguHesapla() {
    const stay = parseFloat(document.getElementById('hc-chain-stay').value);
    const front = parseInt(document.getElementById('hc-chain-front').value);
    const rear = parseInt(document.getElementById('hc-chain-rear').value);

    if (!stay || !front || !rear) return;

    // Formula: L = 2(C) + (F/4 + R/4 + 1) -> in inches
    const stayInches = stay / 2.54;
    const lengthInches = (2 * stayInches) + (front / 4) + (rear / 4) + 1;
    
    // 1 inch = 2 links
    let links = Math.ceil(lengthInches * 2);
    if (links % 2 !== 0) links++; // Zincir baklaları her zaman çift sayı olmalıdır

    document.getElementById('hc-chain-val').innerText = links + ' Bakla';
    document.getElementById('hc-chain-result').classList.add('visible');
}
