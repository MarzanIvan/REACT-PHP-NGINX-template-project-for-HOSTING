import { useState, useEffect } from "react";
import "./App.css";

function App() {
  const [name, setName] = useState("");
  const [users, setUsers] = useState([]);

  useEffect(() => {
    fetch("/api/get_users.php")
      .then((res) => res.json())
      .then((data) => setUsers(data))
      .catch((err) => console.error("Ошибка загрузки:", err));
  }, []);

  const handleSubmit = (e) => {
    e.preventDefault();
    if (!name.trim()) return;

    const formData = new FormData();
    formData.append("name", name);

    fetch("/api/add_user.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          setUsers((prev) => [...prev, { id: data.id, name }]);
          setName("");
        } else {
          alert("Ошибка добавления: " + data.error);
        }
      })
      .catch((err) => console.error("Ошибка запроса:", err));
  };

  return (
    <div className="container">
      <h1>Добавление ФИО в базу</h1>

      <form onSubmit={handleSubmit}>
        <input
          type="text"
          name="name"
          placeholder="Введите ФИО"
          value={name}
          onChange={(e) => setName(e.target.value)}
          required
        />
        <button type="submit">Добавить</button>
      </form>

      <h2>Список пользователей:</h2>
      <ul>
        {users.map((u) => (
          <li key={u.id}>{u.name}</li>
        ))}
      </ul>
    </div>
  );
}

export default App;
