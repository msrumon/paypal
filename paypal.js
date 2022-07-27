PayPalSDK.Buttons({
  createOrder: async () => {
    const form = new FormData();
    form.append('amount', 123.45);

    try {
      const res = await fetch('orders/create.php', { method: 'POST', body: form });
      const body = await res.json();

      if (!res.ok) {
        const error = new Error();
        error.code = body.name;
        error.message = body.message;
        throw error;
      }

      console.log(body);
      return body.id;
    } catch (error) {
      console.error(error);
      alert(error.message);
    }
  },
  onApprove: async (data) => {
    const form = new FormData();
    form.append('id', data.orderID);

    try {
      const res = await fetch('orders/capture.php', { method: 'POST', body: form });
      const body = await res.json();

      if (!res.ok) {
        const error = new Error();
        error.code = body.name;
        error.message = body.message;
        throw error;
      }

      console.log(body);
      alert('OK');
      location.reload();
    } catch (error) {
      console.error(error);
      alert(error.message);
    }
  },
}).render('#paypal');
