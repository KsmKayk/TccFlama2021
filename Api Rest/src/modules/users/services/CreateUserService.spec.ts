import AppError from "@shared/errors/AppError";

import FakeUsersRepository from "../repositories/fakes/FakeUsersRepository";
import FakeHashProvider from "../providers/HashProvider/fakes/FakeHashProvider";
import FakeUsersAddressesRepository from "../repositories/fakes/FakeUsersAdressesRepository";
import CreateUserService from "./CreateUserService";

let fakeUsersRepository: FakeUsersRepository;
let fakeHashProvider: FakeHashProvider;
let fakeUsersAddressesRepository: FakeUsersAddressesRepository;
let createUser: CreateUserService;

describe("CreateUser", () => {
  beforeEach(() => {
    fakeUsersRepository = new FakeUsersRepository();
    fakeHashProvider = new FakeHashProvider();
    fakeUsersAddressesRepository = new FakeUsersAddressesRepository();

    createUser = new CreateUserService(
      fakeUsersRepository,
      fakeUsersAddressesRepository,
      fakeHashProvider
    );
  });

  it("should be able to create a new user", async () => {
    const user = await createUser.execute({
      name: "John Doe",
      email: "johndoe@example.com",
      password: "123123",
      gender: "M",
      cellphone: "21999999999",
      telephone: "2199999999",
      cep: "01001000",
      house_number: "122",
    });

    expect(user).toHaveProperty("id");
  });

  it("should not be able to create a new user with same email", async () => {
    await createUser.execute({
      name: "John Doe",
      email: "johndoe@example.com",
      password: "123123",
      gender: "M",
      cellphone: "21999999999",
      telephone: "2199999999",
      cep: "01001000",
      house_number: "122",
    });

    await expect(
      createUser.execute({
        name: "John Doe",
        email: "johndoe@example.com",
        password: "123123",
        gender: "M",
        cellphone: "21999999999",
        telephone: "2199999999",
        cep: "01001000",
        house_number: "122",
      })
    ).rejects.toBeInstanceOf(AppError);
  });
});
