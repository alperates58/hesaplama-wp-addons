function hcKayakPaddleHesapla() {
    const height = parseFloat(document.getElementById('hc-kp-height').value);
    const type = document.getElementById('hc-kp-type').value;

    if (!height) {
        alert('Lütfen boyunuzu giriniz.');
        return;
    }

    let paddleLen = 220; // Default

    if (type === 'recreational') {
        paddleLen = height < 165 ? 210 : (height < 185 ? 230 : 240);
    } else if (type === 'touring') {
        paddleLen = height < 165 ? 205 : (height < 185 ? 220 : 230);
    } else if (type === 'whitewater') {
        paddleLen = height < 165 ? 190 : (height < 185 ? 200 : 210);
    }

    const resVal = document.getElementById('hc-kp-res-val');
    resVal.innerText = paddleLen;

    document.getElementById('hc-kayak-paddle-result').classList.add('visible');
}
