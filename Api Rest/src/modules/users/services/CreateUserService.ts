import { injectable, inject } from "tsyringe";

import AppError from "@shared/errors/AppError";

import User from "../infra/typeorm/entities/User";
import IUsersRepository from "../repositories/IUsersRepository";
import IUsers_AddressesRepository from "../repositories/IUsers_AddressesRepository";
import IHashProvider from "../providers/HashProvider/models/IHashProvider";

interface IRequest {
  name: string;
  email: string;
  password: string;
  gender: string;
  telephone: string;
  cellphone: string;
  cep: string;
  house_number: string;
}

@injectable()
class CreateUserService {
  constructor(
    @inject("UsersRepository")
    private usersRepository: IUsersRepository,

    @inject("UsersAddressesRepository")
    private usersAddressesRepository: IUsers_AddressesRepository,

    @inject("HashProvider")
    private hashProvider: IHashProvider
  ) {}

  public async execute({
    name,
    email,
    password,
    gender,
    telephone,
    cellphone,
    cep,
    house_number,
  }: IRequest): Promise<User> {
    const checkUserExists = await this.usersRepository.findByEmail(email);

    if (checkUserExists) {
      throw new AppError("Email address already used.");
    }

    if (gender != "F" && gender != "M" && gender != "O") {
      throw new AppError("Gender not allowed.");
    }

    const hashedPassword = await this.hashProvider.generateHash(password);

    const user_address = await this.usersAddressesRepository.create({
      cep,
      house_number,
    });

    const user = await this.usersRepository.create({
      name,
      email,
      password_hash: hashedPassword,
      cellphone,
      gender,
      telephone,
      address_id: user_address.id,
    });

    return user;
  }
}

export default CreateUserService;
