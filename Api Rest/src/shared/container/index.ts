import { container } from "tsyringe";
import "@modules/users/providers";
import "./providers";

import IUsersRepository from "@modules/users/repositories/IUsersRepository";
import UsersRepository from "@modules/users/infra/typeorm/repositories/UsersRepository";

import IUsers_AddressesRepository from "@modules/users/repositories/IUsers_AddressesRepository";
import Users_AddressesRepository from "@modules/users/infra/typeorm/repositories/Users_AddressesRepository";

container.registerSingleton<IUsersRepository>(
  "UsersRepository",
  UsersRepository
);
container.registerSingleton<IUsers_AddressesRepository>(
  "UsersAddressesRepository",
  Users_AddressesRepository
);
